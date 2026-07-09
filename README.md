# MongoDB Fundamentals

A collection of MongoDB practice projects created while learning the fundamentals of NoSQL databases. This repository demonstrates basic database operations, CRUD functionality, collections, and document management using MongoDB.

## Features

- Database Creation
- Collection Management
- Insert Documents
- Read Documents
- Update Documents
- Delete Documents
- Query and Filter Documents
- CRUD Operations
- Basic NoSQL Concepts

## Technologies Used

- MongoDB
- MongoDB Compass
- MongoDB Shell (mongosh)

## Learning Objectives

- Understand NoSQL database concepts
- Learn MongoDB document-based data modeling
- Practice CRUD operations
- Perform document queries and filtering
- Manage databases and collections efficiently

## Getting Started

### Prerequisites

- MongoDB Community Server
- MongoDB Compass (optional)
- MongoDB Shell (mongosh)

### Clone the Repository

```bash
git clone https://github.com/Amay135/mongodb-fundamentals.git
```

### Navigate to the Project

```bash
cd mongodb-fundamentals
```

### Start MongoDB Shell

```bash
mongosh
```

### Create or Switch to a Database

```javascript
use mongodbFundamentals
```

## Example CRUD Operations

### Insert

```javascript
db.users.insertOne({
  name: "John",
  age: 20
})
```

### Read

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

This repository serves as a collection of MongoDB exercises and examples completed while learning NoSQL database development. It is intended for educational purposes and as part of my software development portfolio.

## Author

**GitHub:** https://github.com/Amay135
