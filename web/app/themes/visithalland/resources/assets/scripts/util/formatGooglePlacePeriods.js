const weekdays = [
	'Söndag',
	'Måndag', 
	'Tisdag', 
	'Onsdag', 
	'Torsdag', 
	'Fredag', 
	'Lördag',
]

const formatTime = str => `${str.substr(0, 2)}.${str.substr(2)}`

export default periods => {
	const week = weekdays.map((weekday, index) => {
		const period = periods.find(period => period.open.day === index)

		if (period) {
			return {
				day: weekdays[index],
				open: formatTime(period.open.time),
				close: formatTime(period.close.time),
			}
		}

		return {
			day: weekdays[index],
			closed: true
		}
	})
		
	// If week contains a Sunday, move it to the end of the array
	if (week.find(item => item.day === 'Söndag')) {
		week.push(week.shift())
	}

	return week
}
