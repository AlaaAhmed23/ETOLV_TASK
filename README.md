# Backend Assessment: Laravel CRUD with Neo4j

## Task Description

This project implements CRUD operations for the entities **School**, **Subject**, and **Student** using Laravel with two different data access methods:

- **Eloquent ORM** (Laravel's default ORM for relational databases)
- **Neo4j with Cypher Queries** (Graph database approach)

The implementation follows the **Repository-Service pattern** for clean code separation and maintainability.

### Relationships:
- A student is enrolled in only one school.
- A student can register for multiple subjects.
- A subject can be registered by multiple students.

### Key Features:
- CRUD operations for all entities with both Eloquent and Cypher implementations.
- Pagination implemented using Cypher queries.


---

## Summary of Work Done

- Created Laravel models and migrations for School, Subject, and Student using Eloquent ORM.
- Implemented repository-service layers to abstract data access logic.
- Developed CRUD controllers and routes for both Eloquent ORM and Neo4j Cypher methods.
- Implemented Neo4j integration using Cypher queries to perform equivalent CRUD operations on the graph database.
- Enforced relationships via Cypher constraints and Eloquent relations:
  - `ENROLLED_IN` relationship between Student and School.
  - `STUDIES` relationship between Student and Subject.
- Implemented pagination in Neo4j queries.


---

## Project Structure and Implementation Isolation

To keep the two implementations clearly separated, the project is structured as follows:

app/

├── Eloquent/ # Eloquent ORM Implementation

│ ├── Models/

│ ├── Repositories/

│ └── Services/

├── Neo4j/ # Neo4j Cypher Implementation

│ ├── Repositories/

│ └── Services/

routes/

├── eloquent.php # Routes for Eloquent ORM CRUD

└── neo4j.php # Routes for Neo4j Cypher CRUD



- **Eloquent Implementation:** Uses Laravel Models, standard Eloquent ORM queries, and database migrations.
- **Neo4j Implementation:** Uses custom repository classes to execute Cypher queries for all CRUD operations.
- Controllers are separated or handle both implementations based on route grouping.

---

## How to Use

###  Clone the repository

```bash
git clone https://github.com/yourusername/backend-assessment.git
cd backend-assessment


## Contact
For any questions or clarifications, feel free to reach out.

Thank you for reviewing my project!

Best regards,
Alaa Ahmed
