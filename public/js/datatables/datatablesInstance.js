class Employee {
    constructor(name, position, salary, office) {
        this.name = name;
        this.position = position;
        this.salary = salary;
        this._office = office;

        this.office = function () {
            return this._office;
        };
    }
};

$('#example').DataTable({
    data: [
        new Employee("EECKHOUT Rémi", "Symfony Developer", "$3,120", "Amiens"),
        new Employee("PEUPLE Lysa", "Psychologist", "$5,300", "Lille")
    ],
    columns: [
        { data: 'name' },
        { data: 'salary' },
        { data: 'office' },
        { data: 'position' }
    ]
});