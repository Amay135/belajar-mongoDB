# MongoDB Fundamentals

A collection of MongoDB practice projects created while learning the fundamentals of NoSQL databases. This repository covers basic database operations, CRUD functionality, collections, and document management using MongoDB.

## Features

- Create Database
- Create Collection
- Insert Documents
- Read Documents
- Update Documents
- Delete Documents
- Query Documents
- MongoDB CRUD Operations
- Basic NoSQL Concepts

## Technologies Used

- MongoDB
- MongoDB Compass
- MongoDB Shell (mongosh)

## Project Structure

```
.
├── database/
├── collections/
├── queries/
├── examples/
└── README.md
```

> The folder structure may vary depending on the exercises included in this repository.

## Learning Objectives

- Understand NoSQL database concepts
- Learn MongoDB document structure
- Perform CRUD operations
- Practice querying and filtering documents
- Manage collections and databases

## Getting Started

### Prerequisites

- MongoDB Community Server
- MongoDB Compass (optional)
- MongoDB Shell (mongosh)

### Clone Repository

```bash
git clone https://github.com/Amay135/belajar-mongoDB.git
```

### Open MongoDB Shell

```bash
mongosh
```

### Create a Database

```javascript
use belajarMongoDB
```

### Show Databases

```javascript
show dbs
```

## Example CRUD

### Insert

```javascript
db.users.insertOne({
    name: "John",
    age: 20
})
```

### Find

```javascript
db.users.find()
```

### Update

```javascript
db.users.updateOne(
    { name: "John" },
    { $set: { age: 21 } }
)
```

### Delete

```javascript
db.users.deleteOne({
    name: "John"
})
```

## Repository Purpose

This repository is intended for educational purposes and documents my learning journey with MongoDB and NoSQL databases.

## Author

GitHub: **Amay135**
