import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import ReactPaginate from 'react-paginate';
import Sidebar from 'react-sidebar';
import axios from 'axios';

import HelpContainer from '../HelpContainer/HelpContainer';
import Loader from '../Loader/Loader';
import TestOption from '../TestOption/TestOption';
import ReactHtmlParser from 'react-html-parser';

import './TestContainer.css';

export default class TestContainer extends Component {
  constructor(props) {
    super(props);

    const pageContainer = document.getElementById('informativeTest');
    const { dataset } = pageContainer;

    this.state = {
      dataset,
      index: 0,
      isSidebarOpen: false,
      isLoading: false,
      events: [],
    };

    this.handlePageClick = this.handlePageClick.bind(this);
    this.handleSidebarOpen = this.handleSidebarOpen.bind(this);
  }

  componentDidMount() {
    const { dataset } = this.state;
    const { fetchurl: url } = dataset || {};

    this.setState({ isLoading: true }, () => {
      return this.fetchQuestions(url);
    });
  }

  handlePageClick(data) {
    const { selected } = data || {};

    this.setState({ index: selected });
  }

  fetchQuestions(url) {
    const unitID = this.parsePathName();

    const fallbackPath = `/test/getTest/${unitID}`;
    const urlToUse = url || fallbackPath;

    axios
      .get(urlToUse)
      .then(response => {
        const { data } = response || {};

        this.setState({
          isLoading: false,
          events: data,
        });
      })
      .catch(error => {
        this.setState({ isLoading: false });
        console.log(error);
      });
  }

  parsePathName() {
    const { pathname } = window.location;
    const splitPathName = pathname.split('/');

    return splitPathName.pop();
  }

  renderQuestion() {
    const { events, index } = this.state;
    const { event, options, helps } = events[index] || {};
    const { header, message } = event || {};

    const shouldRenderHelpButton = helps && helps.length;

    return (
      <div>
        <div className="header-container">
          <div>{header}</div>
          {!!shouldRenderHelpButton && (
            <button
              type="button"
              onClick={() => this.handleSidebarOpen(true)}
              className="btn btn-info help-btn"
            >
              <i className="fas fa-info large-icon" />
            </button>
          )}
        </div>
        <div className="header-message">{ReactHtmlParser(message)}</div>
        <div className="col-md-12">{this.renderOptions(options)}</div>
      </div>
    );
  }

  handleSidebarOpen(isOpen) {
    this.setState({ isSidebarOpen: isOpen });
  }

  renderSidebarContent() {
    const { events, index } = this.state;
    const { helps } = events[index] || {};
    const shouldRenderHelpContainer = helps && !!helps.length;

    return shouldRenderHelpContainer ? (
      <HelpContainer helps={helps} />
    ) : (
      <div />
    );
  }

  renderOptions(options) {
    return (
      options &&
      options.map(option => {
        const { id } = option || {};

        return <TestOption key={id} option={option} />;
      })
    );
  }

  render() {
    const { dataset, events, index, isLoading, isSidebarOpen } = this.state;
    const { returnurl } = dataset;
    const { helps } = events[index] || {};

    const pageCount = events && events.length;

    const isHelpButtonDisabled = helps && !!helps.length ? '' : 'disabled';

    if (isLoading) {
      return <Loader />;
    }

    return (
      <Sidebar
        sidebar={this.renderSidebarContent()}
        open={isSidebarOpen}
        onSetOpen={this.handleSidebarOpen}
        styles={{
          sidebar: { background: 'white', width: 400 },
          root: { marginTop: 50 },
        }}
      >
        <div className="test-container">
          <div>{this.renderQuestion()}</div>
          <div className="pagination-container d-flex">
            <ReactPaginate
              nextLabel=">"
              previousLabel="<"
              breakLabel="..."
              breakClassName="break-me"
              pageCount={pageCount}
              pageRangeDisplayed={5}
              marginPagesDisplayed={1}
              onPageChange={this.handlePageClick}
              containerClassName="pagination"
              activeClassName="active"
              previousLinkClassName="react-paginate-previous"
              nextLinkClassName="react-paginate-next"
            />
          </div>
          <div className="button-container">
            <a
              className="btn btn-primary"
              style={{ width: 145 }}
              href={returnurl}
            >
              Ukončiť test
            </a>
            <a
              className={`btn btn-success ${isHelpButtonDisabled}`}
              style={{ width: 145 }}
              onClick={() => this.handleSidebarOpen(true)}
            >
              Zobraziť nápovedy
            </a>
          </div>
        </div>
      </Sidebar>
    );
  }
}

if (document.getElementById('TestContainer')) {
  ReactDOM.render(<TestContainer />, document.getElementById('TestContainer'));
}
