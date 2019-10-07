import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import './TestOption.css';

class TestOption extends Component {
  constructor(props) {
    super(props);

    this.state = {
      isResolved: false,
    };

    this.handleClick = this.handleClick.bind(this);
  }

  handleClick() {
    this.setState({ isResolved: true });
  }

  getColor() {
    const { isResolved } = this.state;
    const { option } = this.props;
    const { correct_answer } = option || {};

    if (!isResolved) {
      return '';
    }

    return correct_answer ? 'correct' : 'wrong';
  }

  render() {
    const { option } = this.props;
    const { answer_data } = option;

    const type = this.getColor();

    return (
      <button className={`option ${type}`} onClick={this.handleClick}>{answer_data}</button>
    );
  }
}

export default TestOption;
