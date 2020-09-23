# Bank Transfer Kata

* Write some code to transfer a specified amount of money from one bank account (the payer) to another (the payee)
* Write some code to keep a record of the transfer for both bank accounts in a transaction history
* Write some code to query a bank account's transaction history for any bank transfers to or from a specific account

## Additional challenge
(Added after completing the Kata)

The code to query a bank account's transaction history for any bank transfers to or from a specific account violates OCP (Open/Close Principle).

* Add a new test for a new requirement that fails:
    * Query a bank account's transaction history for any bank transfers that have a specific amount.

* Now refactor the code, resolving OCP violation, so that only the new test fails.
* Now add new code for the new requirement, without changing the existing function.
