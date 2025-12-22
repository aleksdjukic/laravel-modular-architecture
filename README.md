# Modular Laravel API – Reference Implementation

This repository demonstrates a modular Laravel backend architecture focused on
clean code, separation of concerns, and testable application design.

The goal of this repository is to showcase backend architecture and engineering
practices rather than provide a full runnable application.

## Architecture Overview

The codebase is organized into isolated domain modules under `app/Modules`:

- Auth
- Company
- Job
- Application

Each module follows a consistent structure:
- Controllers as thin HTTP adapters
- DTOs for input mapping and validation
- Services containing domain and business logic
- Repository interfaces with Eloquent implementations
- Policies for authorization rules
- Explicit domain exceptions
- API Resources for response transformation
- Module-owned routes and service providers

Request flow:
HTTP → Controller → DTO → Service → Repository → Database

All API responses are returned via Laravel Resources, ensuring a consistent and
explicit response format across endpoints. Authorization is enforced through
policies, and domain violations are expressed using custom exceptions rather than
generic errors.

## Why Modular Architecture?

Modular architecture allows systems to scale in complexity without becoming
tightly coupled. Each domain evolves independently, responsibilities remain clear,
and long-term maintainability is improved.

This approach is particularly effective for multi-domain systems and long-lived
backend applications.

## Testing & CI

The repository includes Feature and Unit tests covering real API workflows,
authorization rules, and domain edge cases. A GitHub Actions workflow demonstrates
a production-style CI setup.

## Scope

This repository focuses on application-layer design. Framework bootstrap and
infrastructure concerns are intentionally omitted to keep the emphasis on
architecture, domain logic, and testing practices.
