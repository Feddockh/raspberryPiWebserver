import pymysql

conn  = pymysql.connect(
    host = 'localhost', 
    user = 'vce', 
    password = 'Volvo1927', 
    database = 'vce'
)

# Create a cursor object
cur  = conn.cursor( )

FIRSTNAME = 'Joe'
LASTNAME = 'Greenwalt'
  
query = f"INSERT INTO scoreboard (firstname, lastname) VALUES ('{FIRSTNAME}', '{LASTNAME}')"
  
cur.execute(query)
print(f"{cur.rowcount} details inserted")
conn.commit()
conn.close()