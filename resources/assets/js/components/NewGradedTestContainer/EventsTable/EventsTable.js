import React, { Component, Fragment } from 'react';
import moment from 'moment';

import EventsTableRow from './EventTableRow';

import './EventsTable.css';

class EventsTable extends Component {
  handleCollapse = () => {};

  render() {
    const {
      events,
      handleAddEvents,
      handleAllCheckboxChange,
      handleCheckboxChange,
      isEveryEventChecked,
    } = this.props;

    if (!events || !events.length) {
      return (
        <div className="warning-container">
          Zvolená jednotka neobsahuje žiadne udalosti, alebo všetky udalosti už
          boli vybraté.
        </div>
      );
    }

    return (
      <div>
        <div className="panel panel-default">
          <div className="panel-heading">Vyberte si z tabulky</div>
          <table className="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Názov</th>
                <th>Vytvorené</th>
                <th>Čas na obsluhu</th>
                <th>Vybrať</th>
                <th>Detail</th>
              </tr>
              <tr>
                <th />
                <th />
                <th />
                <th />
                <th>
                  <input
                    checked={isEveryEventChecked}
                    type="checkbox"
                    name="everyItem"
                    value={isEveryEventChecked}
                    onChange={handleAllCheckboxChange}
                  />
                </th>
                <th />
              </tr>
            </thead>
            <tbody>
              {events.map((item, index) => {
                const { id } = item || {};

                return (
                  <EventsTableRow
                    key={id}
                    item={item}
                    handleCheckboxChange={handleCheckboxChange}
                    index={index}
                  />
                );
              })}
            </tbody>
          </table>
        </div>
        <button className="btn btn-primary" onClick={handleAddEvents}>
          Pridať vybraté
        </button>
      </div>
    );
  }
}

export default EventsTable;
