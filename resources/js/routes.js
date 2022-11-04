import EmployeesIndex from "./components/employees/Index";
import EmployeesCreate from "./components/employees/Create";
import EmployeesEdit from "./components/employees/Edit";
import CountriesIndex from "./components/countries/Index";
import CountriesCreate from "./components/countries/Create";
import CountriesEdit from "./components/countries/Edit";
import StatesIndex from "./components/states/Index";
import StatesCreate from "./components/states/Create";
import StatesEdit from "./components/states/Edit";

export const routes = [
    {
        path: "/employees",
        name: "EmployeesIndex",
        component: EmployeesIndex
    },
    {
        path: "/employees/create",
        name: "EmployeesCreate",
        component: EmployeesCreate
    },
    {
        path: "/employees/:id",
        name: "EmployeesEdit",
        component: EmployeesEdit
    },
    {
        path: "/countries",
        name: "CountriesIndex",
        component: CountriesIndex
    },
    {
        path: "/countries/create",
        name: "CountriesCreate",
        component: CountriesCreate
    },
    {
        path: "/countries/:id",
        name: "CountriesEdit",
        component: CountriesEdit
    },
    {
        path: "/states",
        name: "StatesIndex",
        component: StatesIndex
    },
    {
        path: "/states/create",
        name: "StatesCreate",
        component: StatesCreate
    },
    {
        path: "/states/:id",
        name: "StatesEdit",
        component: StatesEdit
    },
];