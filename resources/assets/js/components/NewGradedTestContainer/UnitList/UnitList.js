import React from 'react';

import UnitListItem from './UnitListItem';

import './UnitList.css';

const UnitList = ({ handleClick, selectedUnit, units }) => {
  return (
    <div>
      {units.map((item, index) => {
        const { id, title } = item || {};

        const isSelected = selectedUnit === index;

        return (
          <UnitListItem
            key={id}
            index={index}
            item={item}
            handleClick={handleClick}
            isSelected={isSelected}
            label={title}
          />
        );
      })}
    </div>
  );
};

export default UnitList;
