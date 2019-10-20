import React, { Component } from 'react';

import HelpListItem from './HelpListItem';

import './HelpList.css';

class HelpList extends Component {
  renderItems() {
    const { handleSelectHelp, helps } = this.props;

    return (
      helps &&
      helps.map((help, index) => {
        const { id } = help;

        return (
          <HelpListItem
            help={help}
            key={id}
            index={index}
            handleSelectHelp={handleSelectHelp}
          />
        );
      })
    );
  }

  render() {
    return <div className="react-help-list">{this.renderItems()}</div>;
  }
}

export default HelpList;
