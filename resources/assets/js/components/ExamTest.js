import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import ExamContainer from './ExamContainer/ExamContainer';

export default class ExamTest extends Component {
    render() {
        return (
          <div className="container">
              <ExamContainer />
          </div>
        );
    }
}

if (document.getElementById('examTest')) {
    ReactDOM.render(<ExamTest />, document.getElementById('examTest'));
}
