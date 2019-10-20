import React, { Component } from 'react';
import ReactHtmlParser from 'react-html-parser';

import './SelectedEvent.css';

class SelectedEvent extends Component {
  state = { isCollapsed: false };

  setCollapsedClassName = () => {
    const { isCollapsed } = this.state;

    return isCollapsed
      ? 'collapsible-content-event'
      : 'collapsible-content-event collapsed-event';
  };
  setDetailIconClassName = () => {
    const { isCollapsed } = this.state;

    return isCollapsed ? 'detail up' : 'detail down';
  };

  handleCollapse = () => {
    const { isCollapsed } = this.state;

    this.setState({ isCollapsed: !isCollapsed });
  };

  render() {
    const { handleDeselectEvent, selectedEvent } = this.props;
    const { header, id, message } = selectedEvent || {};

    return (
      <div>
        <div className="main-container">
          {header}
          <div className="actions-container">
            {message && (
              <button
                className={`action-icon ${this.setDetailIconClassName()}`}
                onClick={this.handleCollapse}
              >
                <i className="fas fa-chevron-down" />
              </button>
            )}
            <button
              className="action-icon delete"
              onClick={handleDeselectEvent(id)}
            >
              <i className="fas fa-times red" />
            </button>
          </div>
        </div>
        <div className={this.setCollapsedClassName()}>
          {ReactHtmlParser(message)}
        </div>
      </div>
    );
  }
}

export default SelectedEvent;
