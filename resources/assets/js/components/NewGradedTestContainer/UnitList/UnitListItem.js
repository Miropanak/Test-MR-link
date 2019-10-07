import React from 'react';

import './UnitListItem.css';

const UnitListItem = ({ handleClick, index, item, isSelected, label }) => {
  const isSelectedClassname = isSelected ? 'selected' : '';

  return (
    <div
      className={`unit-item ${isSelectedClassname}`}
      onClick={handleClick(item, index)}
    >
      {`• ${label}`}
    </div>
  );
};

export default UnitListItem;
