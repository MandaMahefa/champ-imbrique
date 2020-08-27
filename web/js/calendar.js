let $user = $('.calendar').data('allUsers');
console.log(JSON.parse($user));
$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
    },
    defaultDate: '2020-07-29',
    navLinks: true,
    eventLimit: true,
    editable: true,
    events: [{
        title: 'Manda',
        description: 'Presence',
        start: '2020-07-01T09:05:32',
        color: '#44ff37',
        end: '2020-07-01T15:05:32'
    },
        {
            title: 'Narindra',
            description: 'Presence',
            start: '2020-07-02T08:05:32',
            color: '#ffe358',
            end: '2020-07-02T12:05:32'
        },
        {
            title: 'Domoina',
            description: 'Presence',
            start: '2020-08-01T11:05:32',
            color: '#ff46f5',
            end: '2020-08-01T15:05:32'
        },
        {
            id: 999,
            title: 'Repeating Event',
            description: 'description for Repeating Event',
            start: '2020-08-09T16:00:00'
        },
        {
            id: 999,
            title: 'Repeating Event',
            description: 'description for Repeating Event',
            start: '2020-08-16T16:00:00'
        },
        {
            title: 'Conference',
            description: 'description for Conference',
            start: '2020-08-11',
            end: '2020-08-13'
        },
        {
            title: 'Meeting',
            description: 'description for Meeting',
            start: '2020-08-12T10:30:00',
            end: '2020-08-12T12:30:00'
        },
        {
            title: 'Lunch',
            description: 'description for Lunch',
            start: '2020-08-12T12:00:00',
            end: '2020-08-12T14:00:00'
        },
        {
            title: 'Meeting',
            description: 'description for Meeting',
            start: '2020-08-12T14:30:00'
        },
        {
            title: 'Birthday Party',
            description: 'description for Birthday Party',
            color: 'red',
            textColor: '#FFF',
            start: '2020-08--13T07:00:00'
        },
        {
            title: 'Click for Google',
            description: 'description for Click for Google',
            url: 'http://google.com/',
            start: '2020-08-28'
        }
    ]
});

