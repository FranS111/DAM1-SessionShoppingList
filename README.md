## Features

- **Session Initialization**:
  - Creates a session to store user-specific data.
  - Sets a default list name or uses the name provided by the user via a `GET` request.

- **Item Management**:
  - Add items to the shopping list with name, price, and quantity.
  - Edit the details of existing items.
  - Delete items from the list.

- **Total Price Calculation**:
  - Dynamically calculates and displays the total cost of all items in the list.

- **User-Friendly Output**:
  - Displays all items in the list with their respective names, prices, and quantities.

## Project Structure

### PHP Logic

The PHP logic manages the following:

1. **Session Management**:
   - Starts a session to store user data (`$_SESSION`).
   - Checks and initializes session variables for the list.

2. **CRUD Operations**:
   - Add, edit, and delete items using `POST` requests.
   - Validate and sanitize input to prevent errors.

3. **Price Calculation**:
   - Iterates through the session-stored list and computes the total cost.

4. **Dynamic Display**:
   - Prints the list contents in a human-readable format.

### HTML Forms

The HTML part contains forms for interacting with the shopping list:

- **Add Item**: Form to add new items.
- **Edit Item**: Form to edit existing items by name.
- **Delete Item**: Form to delete an item by name.
- **Set List Name**: Form to set or update the list name.
