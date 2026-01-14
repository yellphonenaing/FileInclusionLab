# A08:2021 – Software and Data Integrity Failures
Focuses on making assumptions about software updates, critical data, and CI/CD pipelines without verifying integrity.

### Examples
* Unserialize of untrusted data (Insecure Deserialization).
* Using objects from untrusted CDNs.

### Prevention
Use digital signatures to verify that the data or software has not been tampered with.
