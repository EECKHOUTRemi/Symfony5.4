const data = [
    {
        "name": "MAYOL Kévin",
        "position": "Chargé SIRH",
        "salary": "$3,120",
        "start_date": "2011/04/25",
        "office": "Amiens",
        "extn": "5421"
    },
    {
        "name": "COURET Mathieu",
        "position": "Symfony developer",
        "salary": "$5,300",
        "start_date": "2011/07/25",
        "office": "Amiens",
        "extn": "8422"
    }
]

$('#example').DataTable({
    data: data,
    columns: [
        { data: 'name' },
        { data: 'position' },
        { data: 'salary' },
        { data: 'office' }
    ]
});