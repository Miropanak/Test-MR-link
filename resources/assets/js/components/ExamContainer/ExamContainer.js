import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import ReactPaginate from 'react-paginate';
import axios from 'axios';

import Loader from '../Loader/Loader';
import ExamOption from '../ExamOption/ExamOption';
import Countdown from 'react-countdown-now';
import ReactHtmlParser from 'react-html-parser';

import './ExamContainer.css';

export default class ExamContainer extends Component {
  constructor(props) {
    super(props);

    const pageContainer = document.getElementById('examTest');
    const { dataset } = pageContainer;

    this.state = {
      dataset,
      events: [],
      index: 0,
      isLoading: false,
      selectedOption: -1,
      selectedOptions: []
    };

    this.handlePageClick = this.handlePageClick.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.getDisabledButtonStyle = this.getDisabledButtonStyle.bind(this);
  }

  componentDidMount() {
    const { dataset } = this.state;
    const { fetchurl: url } = dataset || {};

    this.setState({ isLoading: true }, () => {
      return this.fetchQuestions(url);
    });
  }

  handlePageClick(data) {
    const { index } = this.state;
    const { selected } = data || {};

    if (selected > index) {
        const { selectedOptions, selectedOption } = this.state;
        this.setState({ selectedOptions: [...selectedOptions, selectedOption], selectedOption: -1, index: selected });
    }
  }

  handleSetSelectedOption = id => () => this.setState({ selectedOption: id });

  handleSubmit() {
    const { dataset, selectedOptions, selectedOption } = this.state || {};
    const { submiturl, resulturl, testid } = dataset;

    this.setState({ selectedOptions: [...selectedOptions, selectedOption]}, () => {
      const { selectedOptions } = this.state;
      axios
          .post(submiturl, {
              selectedOptions,
              testid
          })
          .then(() => {
              window.location.replace(resulturl);
          })
          .catch(error => {
              console.log(error);
          });
    });
  };


  getDisabledButtonStyle() {
    const { index, events } = this.state;
    const pageCount = events && events.length;

    if ((index + 1) < pageCount) {
        return 'disabled';
    }

    return '';
  };

  fetchQuestions(url) {
    const testID = this.parsePathName();

    const fallbackPath = `/exam/getEventList/${testID}`;
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
    const { event, options } = events[index] || {};
    const { header, message } = event || {};

    return (
      <div>
        <div className="header-container">
          <div>{header}</div>
        </div>
        <div className="header-message">{ReactHtmlParser(message)}</div>
        <div className="col-md-12">{this.renderOptions(options)}</div>
      </div>
    );
  }

  renderOptions(options) {
    const { selectedOption } = this.state;

    return (
      options &&
      options.map(option => {
        const { id } = option || {};
        const isSelected = id === selectedOption;

        return (
          <ExamOption
            key={id}
            isSelected={isSelected}
            onClick={this.handleSetSelectedOption(id)}
            option={option}
          />
        );
      })
    );
  }

  render() {
    const { dataset, events, isLoading } = this.state;
    const { endtimestamp } = dataset;

    const endDate = new Date(parseInt(endtimestamp));

    const pageCount = events && events.length;

    if (isLoading) {
      return <Loader />;
    }

    return (
        <div className="test-container">
          <div>{this.renderQuestion()}</div>
          <div className="pagination-container d-flex">
            <ReactPaginate
              nextLabel="Ďaľšia otázka"
              previousLabel=""
              breakLabel="..."
              breakClassName="break-me"
              pageCount={pageCount}
              pageRangeDisplayed={0}
              marginPagesDisplayed={1}
              onPageChange={this.handlePageClick}
              pageClassName="page"
              containerClassName="pagination"
              activeClassName="active"
              previousLinkClassName="react-paginate-previous"
              nextLinkClassName="react-paginate-next"
            />
              <div className="totalQuestions">
                Celkový počet otázok v teste: {pageCount}
              </div>
          </div>
          <div className="button-container">
              <button
                  className={`btn btn-primary ${this.getDisabledButtonStyle()}`}
                  style={{ width: 145 }}
                  onClick={this.handleSubmit}
              >
                  Odovzdať test
              </button>
              <div className="countdown">
              <Countdown
                  date={endDate}
                  daysInHours={true}
                  onComplete={this.handleSubmit}
              />
              </div>
          </div>
        </div>
    );
  }
}

if (document.getElementById('ExamContainer')) {
  ReactDOM.render(<ExamContainer />, document.getElementById('ExamContainer'));
}
