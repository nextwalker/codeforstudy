# kill server
lsof -i:8111 | awk 'NR >= 2 {print $2}' | xargs kill -9 2&>/dev/null

# start server
gunicorn -b 0.0.0.0:8111 cloudws.wsgi:application --workers=3 -D --timeout=45
