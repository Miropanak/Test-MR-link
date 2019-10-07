import React, { useState } from 'react';

import NewTest from './NewTest/NewTest';
import TestStatistics from './TestStatistics/TestStatistics';

const NewGradedTestContainer = () => {
  const [isTestOverview, setIsTestOverview] = useState(false);
  const [selectedEvents, setSelectedEvents] = useState([]);

  if (isTestOverview) {
    return (
      <TestStatistics
        selectedEvents={selectedEvents}
        setIsTestOverview={setIsTestOverview}
      />
    );
  }

  return (
    <NewTest
      selectedEvents={selectedEvents}
      setSelectedEvents={setSelectedEvents}
      setIsTestOverview={setIsTestOverview}
    />
  );
};

export default NewGradedTestContainer;
