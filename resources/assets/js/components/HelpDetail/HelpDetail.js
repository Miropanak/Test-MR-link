import React, { Component } from 'react';

import './HelpDetail.css';

const HelpDetail = ({ selectedHelp }) => {
  const { name, url } = selectedHelp || {};

  return (
    <div className="react-help-detail-container">
      <div className="react-help-detail-title">{name}</div>
      <div>{url}</div>
    </div>
  );
};

export default HelpDetail;
