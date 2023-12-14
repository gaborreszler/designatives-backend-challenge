## Backend Developer Entry Test Task

**Objective:**  
To assess your skills in Laravel 10, we have prepared a series of tasks for you to complete. Please fork the specified repository, complete the tasks, and grant access to the 'designatives' organization upon completion.

**Instructions:**
1. **Fork the Repository:**  
   Fork the provided repository to begin your task.

2. **Service Model and Database Migration:**
    - Create a `Service` model.
    - Define the following fields in your database migration:
        - `id`: Unique identifier for the service.
        - `name`: A descriptive name for the service.
        - `monthlyPrice`: The monthly price of the service.

3. **Database Seeder:**
    - Develop a seeder to populate the `Service` model.
    - Generate 50 random services with varying names.
    - Ensure the `monthlyPrice` is set between 10 and 50.

4. **API Endpoints:**
    - Develop two API endpoints.
    - Both endpoints should accept three required parameters, validated for type: `startDate`, `endDate`, and `serviceId`.
    - Utilize the `App\Classes\BasePriceCalculator` abstract class as the base for your service price calculation logic.

   **First Endpoint (Full Month Calculation):**
    - Calculate the price of the service between the given dates.
    - Count full months only (e.g., Jan 12 to Mar 28 should be calculated from Jan 1 to Mar 31).

   **Second Endpoint (Daily Price Calculation):**
    - Calculate the price of the service between the given dates on a daily basis.
    - Daily price calculation formula: (monthly price * 12) / 365.

5. **Unit Tests (Optional):**
    - Write unit tests for both endpoints to ensure accurate calculations.

**Best Practices:**  
Please adhere to Laravel's best practices throughout your work. This will be a key aspect of the evaluation.

**Submission:**  
Upon completion, grant access to the 'designatives' organization to your forked repository for review.
