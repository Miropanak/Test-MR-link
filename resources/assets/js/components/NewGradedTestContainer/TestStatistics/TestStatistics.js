import React, { useState } from 'react';
import DateTime from 'react-datetime';
import moment from 'moment';

import 'react-datetime/css/react-datetime.css';
import './TestStatistics.css';

const TestStatistics = ({ setIsTestOverview, selectedEvents }) => {
  const [isCalendarOpen, setIsCalendarOpen] = useState(false);
  const [examStartDate, setExamStartDate] = useState('');
  const [testName, setTestName] = useState('');

  const handleDateChange = date => {
    setExamStartDate(moment(date));
    setIsCalendarOpen(false);
  };

  const getDisabledButtonStyle = () => {
    if (!testName || !examStartDate) {
      return 'disabled';
    }

    return '';
  };

  const handleSubmit = () => {
    const pageContainer = document.getElementById('newGradedTest');
    const { dataset } = pageContainer;
    const { createexamurl: createExamUrl, returnurl: returnUrl } =
      dataset || {};

    const formattedExamStartDate = moment(examStartDate).format('D.M.YYYY');

    axios
      .post(createExamUrl, {
        examStartDate: formattedExamStartDate,
        selectedEvents,
        testName,
      })
      .then(response => {
        window.location.replace(returnUrl);
      })
      .catch(error => {
        console.log(error);
      });
  };

  const renderExamDate = () => {
    if (!examStartDate) {
      return '';
    }

    return moment(examStartDate).format('D.M.YYYY');
  };

  const handleTestNameChange = event => {
    const { target } = event;
    const { value } = target || {};

    setTestName(value);
  };

  const numberOfQuestions = selectedEvents.length;
  const totalHandleTime = selectedEvents.reduce((acc, cur) => {
    const { time_to_handle } = cur || {};

    return acc + time_to_handle;
  }, 0);

  const isSubmitButtonDisabled = !testName || !examStartDate;

  return (
    <div className="container">
      <h1>Vlastnosti testu</h1>
      <div className="input-container">
        <label className="name-label" htmlFor="testName">
          Názov testu
        </label>
        <input
          className="name-input"
          id="testName"
          name="testName"
          value={testName}
          onChange={handleTestNameChange}
          placeholder="Zadaj názov testu"
        />
      </div>
      <div className="statistics-container">
        <div className="statistics-item">{`Počet otázok: ${numberOfQuestions}`}</div>
        <div className="statistics-item">{`Celkový čas potrebný na obsluhu: ${totalHandleTime} min.`}</div>
        <div className="datetime-container">
          <span>{`Dátum testu: ${renderExamDate()}`}</span>
          <button
            className="calendar-button"
            onClick={() => setIsCalendarOpen(true)}
          >
            <i className="far fa-calendar-alt" />
          </button>
          <DateTime
            className="test-datetime"
            input={false}
            open={isCalendarOpen}
            locale="sk"
            timeFormat={false}
            onChange={handleDateChange}
          />
        </div>
      </div>
      <div className="buttons-container">
        <button
          disabled={isSubmitButtonDisabled}
          style={{ width: 120 }}
          className={`btn btn-success ${getDisabledButtonStyle()}`}
          onClick={handleSubmit}
        >
          Vytvoriť test
        </button>
        <button
          style={{ width: 120 }}
          className="btn btn-primary"
          onClick={() => setIsTestOverview(false)}
        >
          Späť
        </button>
      </div>
    </div>
  );
};

export default TestStatistics;
