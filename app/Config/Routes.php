<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

# Routes for Employee Management System
$routes->get('employee', to:'EmployeeController::index');

# Adding a new employee
$routes->get('addEmployee', to:'EmployeeController::addEmployee'); # Redirects the user to the addEmployee view
$routes->post('createEmployee', to:'EmployeeController::createEmployee'); # Executes the createEmployee function from the EmployeeController class

# Editing an employee

$routes->get('employee/edit/(:num)', to:'EmployeeController::editEmployee/$1');
$routes->post('updateEmployee/(:num)', to:'EmployeeController::updateEmployee/$1');

# Deletes an employee

$routes->get('deleteEmployee/(:num)', to:'EmployeeController::deleteEmployee/$1');
