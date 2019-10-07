import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import HelpDetail from '../HelpDetail/HelpDetail';
import HelpList from '../HelpList/HelpList';

import './HelpContainer.css';

class HelpContainer extends Component {
  constructor(props) {
    super(props);

    this.state = {
      helps: props.helps,
      selectedIndex: null,
    };

    this.selectHelp = this.selectHelp.bind(this);
  }

  selectHelp(selectedIndex) {
    this.setState({ selectedIndex });
  }

  render() {
    const { helps, selectedIndex } = this.state;
    const selectedHelp = helps[selectedIndex];

    return (
      <div className="help-container">
        <h1>Zoznam nápovied</h1>
        <div className="content-container">
          <HelpList helps={helps} handleSelectHelp={this.selectHelp} />
          <HelpDetail selectedHelp={selectedHelp} />
        </div>
      </div>
    );
  }
}

export default HelpContainer;
