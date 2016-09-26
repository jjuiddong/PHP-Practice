
#include "mysqlquery.h"
#pragma comment(lib, "libmysql.lib")

using namespace  std;

void main()
{
	MySQLConnection *sqlConn = new MySQLConnection();
	sqlConn->Connect("192.168.0.4", 3306, "root", "1111", "dirt3");

	MySQLQuery *sqlQuery = new MySQLQuery(sqlConn, 
		"INSERT INTO gameresult(user_id, track, date, race_time, rank) \
		VALUES('jjuiddong', 'finland_track1', '2016-09-26 10:10:10', '1000', '2')" );
	sqlQuery->ExecuteQuery();

}
