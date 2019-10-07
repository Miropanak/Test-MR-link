import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import TestContainer from './TestContainer/TestContainer';

export default class InformativeTest extends Component {
    render() {
      return (
        <div className="container">
          <TestContainer />
        </div>
      );
  }
}

if (document.getElementById('informativeTest')) {
    ReactDOM.render(<InformativeTest />, document.getElementById('informativeTest'));
}
