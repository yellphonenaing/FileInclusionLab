# A03:2021 – Injection
Injection flaws occur when an application sends untrusted data to an interpreter (SQL, NoSQL, OS shell).

### Common Vulnerabilities
* SQL Injection via user input in queries.
* Path Traversal (LFI/RFI) using `include()` functions.

### Prevention
Use parameterized queries (Prepared Statements) and validate/filter all user-supplied input.
