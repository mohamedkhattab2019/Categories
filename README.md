# Category Subcategory Selection Tool

This is a project that demonstrates a category and subcategory selection tool with unlimited levels of subcategories. It is built using [framework name], following the MVC pattern. The project utilizes a database to store the categories and subcategories.

## Features

- Main categories select box
- Unlimited levels of subcategories of parent categories (up to 3 levels are hard-coded for simplicity)
- Ajax for dynamically populating subcategory select boxes
- Git version control for project management and collaboration

## Installation

To run this project locally, follow these steps:

1. Clone the repository from GitHub:
2. Install the necessary dependencies:

```
Composer Install
````
3. Configure the database connection:
- copy .env.example to .env file :
```
cp .env.example .env
```  
- Open the configuration file located at `.env`.
- Update the database connection details (e.g., hostname, username, password) to match your local environment.

4. Set up the database:
run this Command to create DB tablees (Only one table categories) 
```
php artisan db:seed
```
5. Launch the application:

````
php artisan serve
````
OR Xamp directly 

6. Open your web browser and access the application at `http://localhost:[port]/<Folder-NAME>/public`.

## Usage

Once the application is up and running, you can use the category and subcategory selection tool as follows:

1. Start by selecting a main category from the dropdown list.

2. Based on your selection, the tool will dynamically populate the subcategory dropdown list with the corresponding subcategories.

3. If a subcategory has further levels of subcategories, selecting a subcategory will trigger the creation of additional dropdown lists for the subsequent sublevels.

4. Continue selecting categories and subcategories until you have reached the desired level.

5. You can repeat the process for different main categories or reset the selection to start over.

## Contributing

If you would like to contribute to this project, please follow these steps:

1. Fork the repository on GitHub.

2. Create a new branch for your feature or bug fix.

3. Implement your changes, adhering to the coding style and conventions of the project.

4. Test your changes thoroughly.

5. Commit your changes and push them to your forked repository.

6. Submit a pull request, detailing the changes you have made and explaining their purpose.

7. Wait for the project maintainers to review your pull request and provide feedback.


## Contact

If you have any questions or need further assistance with this project, please feel free to contact Mohamed Khattab at mohamedahhkhattab@gmail.com .

