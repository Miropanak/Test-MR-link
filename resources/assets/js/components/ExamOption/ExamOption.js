import React, { Component } from 'react';

import './ExamOption.css';

class ExamOption extends Component {
  getSelectedClassName() {
    const { isSelected } = this.props;

    if (!isSelected) {
      return '';
    }

    return 'selected';
  }

  render() {
    const { onClick, option } = this.props || {};
    const { answer_data } = option || {};

    const selectedClassname = this.getSelectedClassName();

    return (
      <button className={`option ${selectedClassname}`} onClick={onClick}>
        {answer_data}
      </button>
    );
  }
}

export default ExamOption;
