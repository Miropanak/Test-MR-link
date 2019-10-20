import React, { Component, Fragment } from 'react';
import Select from 'react-select';
import axios from 'axios';
import moment from 'moment';

import EventsTable from '../EventsTable/EventsTable';
import Loader from '../../Loader/Loader';
import SelectedEvent from '../SelectedEvent/SelectedEvent';
import UnitList from '../UnitList/UnitList';

import './NewTest.css';

const stringToBoolean = input => {
  if (input === 'true') {
    return true;
  }

  return false;
};

class NewTest extends Component {
  constructor(props) {
    super(props);

    const pageContainer = document.getElementById('newGradedTest');
    const { dataset } = pageContainer;
    const activities = JSON.parse(dataset.allactivities);

    this.state = {
      activities,
      events: [],
      isEveryEventChecked: false,
      isEventsFetching: false,
      lastLoadedUnitID: -1,
      selectedActivity: -1,
      selectedEvent: -1,
      selectedUnit: -1,
      selectedEvents: props.selectedEvents,
    };
  }

  getDatasetContent = () => {
    const pageContainer = document.getElementById('newGradedTest');
    const { dataset } = pageContainer;
    const { fetcheventsurl: fetchEventsUrl, returnurl: returnUrl } =
      dataset || {};

    return { fetchEventsUrl, returnUrl };
  };

  handleChange = selectedOption => {
    const { value } = selectedOption || {};

    this.setState({ selectedActivity: value });
  };

  handleSelectUnit = (selectedUnit, index) => () => {
    const { id } = selectedUnit || {};

    this.setState({ selectedUnit: index });
    this.fetchEvents(id);
  };

  fetchEvents = unitID => {
    const { fetchEventsUrl } = this.getDatasetContent() || {};

    this.setState({ isEventsFetching: true });

    axios
      .get(`${fetchEventsUrl}/${unitID}`)
      .then(response => {
        const { data } = response || {};

        const enhancedData = data.map(item => {
          return { ...item, isChecked: false, unitID };
        });

        this.setState({
          events: enhancedData,
          isEventsFetching: false,
          isEveryEventChecked: false,
          lastLoadedUnitID: unitID,
        });
      })
      .catch(error => {
        this.setState({ isLoading: false });
        console.log(error);
      });
  };

  renderActivities() {
    const { activities } = this.state;

    if (!activities || !activities.length) {
      return (
        <div style={{ textAlign: 'center', fontSize: 16, padding: 20 }}>
          Nie si autorom ani jednej aktivity. Pre zostavenie merateľného testu
          musíš byť autorom aspoň jednej aktivity.
        </div>
      );
    }

    const options = activities.map((activity, index) => {
      const { title } = activity;

      return { label: title, value: index };
    });

    return (
      <Fragment>
        <h1>Vytvoriť nové merateľné testovanie</h1>
        <Select
          placeholder="Vyber aktivitu"
          onChange={this.handleChange}
          options={options}
        />
      </Fragment>
    );
  }

  renderUnits() {
    const { activities, selectedActivity, selectedUnit } = this.state;

    if (selectedActivity === -1) {
      return null;
    }

    const { units } = activities[selectedActivity] || {};

    return (
      <div>
        <h3>Zoznam jednotiek</h3>
        <UnitList
          handleClick={this.handleSelectUnit}
          selectedUnit={selectedUnit}
          units={units}
        />
      </div>
    );
  }

  handleCheckboxChange = clickEvent => {
    const { events } = this.state;
    const { target } = clickEvent;
    const { value } = target;

    const intValue = parseInt(value, 10);

    const filteredEvents = events.map(event => {
      const { id, isChecked } = event || {};

      if (intValue === id) {
        return { ...event, isChecked: !isChecked };
      }

      return event;
    });

    this.setState({ events: filteredEvents });
  };

  handleAllCheckboxChange = clickEvent => {
    const { events } = this.state;
    const { target } = clickEvent;
    const { value } = target;

    const boolValue = stringToBoolean(value);

    const changedEvents = events.map(event => {
      return { ...event, isChecked: !boolValue };
    });

    this.setState({ events: changedEvents, isEveryEventChecked: !boolValue });
  };

  handleAddEvents = () => {
    const { events, selectedEvents } = this.state;

    const filteredEvents = events.reduce((acc, cur) => {
      const { isChecked } = cur;

      if (!acc['currentSelectedEvents']) {
        acc['currentSelectedEvents'] = [];
      }

      if (!acc['currentNonSelectedEvents']) {
        acc['currentNonSelectedEvents'] = [];
      }

      if (isChecked) acc['currentSelectedEvents'].push(cur);
      else acc['currentNonSelectedEvents'].push(cur);

      return acc;
    }, {});

    const { currentNonSelectedEvents, currentSelectedEvents } = filteredEvents;

    this.setState({
      events: currentNonSelectedEvents,
      isEveryEventChecked: false,
      selectedEvents: [...selectedEvents, ...currentSelectedEvents],
    });
  };

  renderEvents() {
    const {
      events,
      isEventsFetching,
      isEveryEventChecked,
      selectedUnit,
    } = this.state;

    if (isEventsFetching) {
      return <Loader />;
    }

    if (selectedUnit === -1) {
      return null;
    }

    return (
      <div>
        <h3>Zoznam udalostí pre vybratú jednotku</h3>
        <EventsTable
          events={events}
          handleAddEvents={this.handleAddEvents}
          handleAllCheckboxChange={this.handleAllCheckboxChange}
          handleCheckboxChange={this.handleCheckboxChange}
          isEveryEventChecked={isEveryEventChecked}
        />
      </div>
    );
  }

  renderSelectedEvents = () => {
    const { selectedEvents } = this.state;

    return selectedEvents.map(selectedEvent => {
      const { id } = selectedEvent || {};

      return (
        <SelectedEvent
          key={id}
          handleDeselectEvent={this.handleDeselectEvent}
          selectedEvent={selectedEvent}
        />
      );
    });
  };

  handleDeselectEvent = id => () => {
    const { events, lastLoadedUnitID, selectedEvents } = this.state;

    const selectedID = parseInt(id, 10);
    const deselectedEvent = selectedEvents.find(event => {
      const { id } = event;

      return id === selectedID;
    });

    const { unitID } = deselectedEvent || {};

    const updatedEvents =
      unitID === lastLoadedUnitID
        ? [...events, { ...deselectedEvent, isChecked: false }]
        : events;

    const filteredSelectedEvents = selectedEvents.filter(selectedEvent => {
      const { id } = selectedEvent;

      return id !== selectedID;
    });

    this.setState({
      events: updatedEvents,
      selectedEvents: filteredSelectedEvents,
    });
  };

  handleDeselectAll = () => {
    const { events, lastLoadedUnitID, selectedEvents } = this.state;

    const filteredEvents = selectedEvents
      .filter(selectedEvent => {
        const { unitID } = selectedEvent || {};

        return unitID === lastLoadedUnitID;
      })
      .map(filteredEvent => {
        return { ...filteredEvent, isChecked: false };
      });

    this.setState({
      events: [...events, ...filteredEvents],
      selectedEvents: [],
    });
  };

  handleRenderTextOverview = () => {
    const { setIsTestOverview, setSelectedEvents } = this.props;
    const { selectedEvents } = this.state;

    setSelectedEvents(selectedEvents);
    setIsTestOverview(true);
  };

  render() {
    const { selectedEvents } = this.state;
    const { returnUrl } = this.getDatasetContent() || {};

    const numberOfQuestions = selectedEvents.length;
    const totalHandleTime = selectedEvents.reduce((acc, cur) => {
      const { time_to_handle } = cur || {};

      return acc + time_to_handle;
    }, 0);

    const shouldRenderSelectedEvents =
      selectedEvents && !!selectedEvents.length;

    return (
      <div style={{ marginBottom: 30 }} className="container">
        <div>{this.renderActivities()}</div>
        <div className="options-container">
          <div className="list-container">{this.renderUnits()}</div>
          <div className="events-container">{this.renderEvents()}</div>
        </div>
        {shouldRenderSelectedEvents && (
          <Fragment>
            <h1>Vybraté udalosti</h1>
            <div className="info-msg">{`Počet otázok: ${numberOfQuestions}`}</div>
            <div className="info-msg">{`Celkový čas na obsluhu: ${totalHandleTime}`}</div>
            {this.renderSelectedEvents()}
            <button
              style={{ marginRight: 10, width: 120 }}
              className="btn btn-success"
              onClick={this.handleRenderTextOverview}
            >
              Pokračovať
            </button>
            <button
              style={{ marginRight: 10, width: 120 }}
              className="btn btn-warning"
              onClick={this.handleDeselectAll}
            >
              Odobrať všetky
            </button>
            <a
              style={{ width: 120 }}
              className="btn btn-primary pull-right"
              href={returnUrl}
            >
              Späť
            </a>
          </Fragment>
        )}
      </div>
    );
  }
}

export default NewTest;
