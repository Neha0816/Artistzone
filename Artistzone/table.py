import mysql.connector

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="Neha7620",
    database="artist"
)


#location = input("Enter a location to find makeup artists: ")

mycursor = mydb.cursor()
mydb.commit()


print("Connection successful.")

#mycursor.execute("select * from makeup_artist")
sql = "SELECT * FROM makeup_artist WHERE address LIKE '%pune%'"
#val = ("%{}%".format(location),)

mycursor.execute(sql)

results = mycursor.fetchall()
for x in results:
    print(x)

