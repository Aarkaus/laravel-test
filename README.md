Laravel Test

Notes
 
•	Please complete the exercise using Symfony 3+ or Laravel and where appropriate, a database abstractions layer for querying the database.
•	You may use database migrations in the framework of your choice or provide raw SQL to build the database.
•	If you believe any other tables are needed to meet the requirements, please expand on the provided database schema as required.
•	Status tables such as ‘CustomerStatus’ should be queried using the ‘Code’ column rather than the ‘Name’ or ‘PK’
•	If you are unable to finish it in full, send through what you were able to complete.
 
Exercise
 
Create a new Symfony or Laravel application with a relational database and map this in PHP using the appropriate models and classes as required by Doctrine (Symfony) or Eloquent (Laravel).
 
The application will contain at least 3 tables that should represent the following data.
 
Customer				CustomerStatus			Order
CustomerId (PK)			CustomerStatusId (PK)	OrderId (PK)
CustomerStatusId (FK)	Code					CustomerId (FK)
Name					Name					OrderStatus
												OrderTotal
 												CreatedDateTime
 
Customer
Include 10 unique dummy customers
 
CustomerStatus
Active (Code: AC)
Removed (Code RE)
 
Order
Include several dummy orders across multiple customers
 
Create a route, controller and any other supporting classes, services or helpers that are needed to display a list of all customers alphanumerically.
•	Highlight ‘Removed’ customers in RED
•	‘Active’ customers who have not placed any orders during the last 12 months in ORANGE
•	‘Active’ customers who have placed a minimum of AUD200.00 in sales over the last 3 months in GREEN (check the ‘OrderStatus’ and make sure you are only including ‘Completed’ orders in this calculation)
•	Include a total order count for each customer
