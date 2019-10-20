import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import NewGradedTestContainer from './NewGradedTestContainer/NewGradedTestContainer';

export default class NewGradedTest extends Component {
  render() {
    return (
      <div className="container">
        <NewGradedTestContainer />
      </div>
    );
  }
}

if (document.getElementById('newGradedTest')) {
  ReactDOM.render(<NewGradedTest />, document.getElementById('newGradedTest'));
}
