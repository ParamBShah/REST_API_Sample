# REST_API_Sample
It is a sample REST API created in PHP that fetches data about movies from sample database created in MySQL.

Tools Used: Postman & phpMyAdmin

Sample Data:
https://test.projects.digitizerventures.com/

API Endpoint:
https://test.projects.digitizerventures.com/api/v1/type1/

Authorization Header:
Bearer iS+fB8g4RAr2V1nS2YjcFQCoU7+ij95XNR8v5W9U6BKXKJ8gTULMf5PJDRhFeitcpxYlNIKj6eQp5t9QaLt70lpOZZbIFuFq0Rb9IWpLot1zLgYNtslsxjN7I9ym6zRvNZ+BmxtR4YBXQax/suPv5I6wYdszhE28wuJMxc/d2NhVHP72IT8CbnmMiYygDqxxu5EUnW9KVXU/HjmXNDnf5Bwx7V5QC2LuuOuGakZhpOE=

Required Parameters (both must be present):
1) length (range: 150 to 185)
2) rating (Anything from: PG, PG-13, R, G, NC-17)

Sample:
https://test.projects.digitizerventures.com/api/v1/type1/?length=160&rating=PG

Optional Parameters (both must be present):
1) maxlimit (range: 1 to 250)
2) offset (range: 1 to 249)

Sample:
https://test.projects.digitizerventures.com/api/v1/type1/?length=160&rating=PG&maxlimit=25&offset=15
