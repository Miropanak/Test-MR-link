import React, { Component } from 'react';

import './HelpListItem.css';

const HelpListItem = ({ help, handleSelectHelp, index }) => {
  const { name } = help;

  return (
    <div className="react-help-item">
      <a className="react-help-link" onClick={() => handleSelectHelp(index)}>
        {name}
      </a>
    </div>
  );
};

export default HelpListItem;
