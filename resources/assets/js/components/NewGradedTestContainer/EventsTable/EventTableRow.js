import React, { Component, Fragment } from 'react';
import ReactHtmlParser from 'react-html-parser';
import moment from 'moment';

import './EventTableRow.css';

class EventTableRow extends Component {
  state = { isCollapsed: true };

  handleChevronStyle = () => {
    const { isCollapsed } = this.state;

    if (isCollapsed) {
      return 'down';
    }

    return 'up';
  };

  handleCollapsibleRowStyle = () => {
    const { isCollapsed } = this.state;

    if (isCollapsed) {
      return 'collapsible-row-hidden';
    }

    return 'collapsible-row-shown';
  };

  handleCollapse = () => {
    const { isCollapsed } = this.state;

    this.setState({ isCollapsed: !isCollapsed });
  };

  renderRowDetail = () => {
    const { item } = this.props;
    const { message } = item || {};

    if (!message) {
      return (
        <div className="detail-info-message">
          Táto udalosť nemá bližší popis
        </div>
      );
    }

    return ReactHtmlParser(message);
  };

  render() {
    const { handleCheckboxChange, index, item } = this.props;
    const { created_at, header, id, isChecked, time_to_handle } = item || {};

    return (
      <Fragment>
        <tr>
          <td style={{ width: '10%' }}>{index + 1}</td>
          <td style={{ width: '40%' }}>{header}</td>
          <td style={{ width: '20%' }}>
            {moment(created_at).format('DD-MM-YYYY')}
          </td>
          <td style={{ width: '20%' }}>{`${time_to_handle} min`}</td>
          <td style={{ width: '10%' }}>
            <input
              checked={isChecked}
              name="itemChecked"
              onChange={handleCheckboxChange}
              type="checkbox"
              value={id}
            />
          </td>
          <td>
            <button
              className={`btn-detail ${this.handleChevronStyle()}`}
              onClick={this.handleCollapse}
            >
              <i className="fas fa-chevron-down" />
            </button>
          </td>
        </tr>
        <tr className={this.handleCollapsibleRowStyle()}>
          <td colSpan={6}>{this.renderRowDetail()}</td>
        </tr>
      </Fragment>
    );
  }
}

export default EventTableRow;
