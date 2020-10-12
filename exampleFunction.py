import so
def lambda_handler(evento, context):
    what_to_print = so.environ.get('what_to_print')
    how_many_times = int(os.environ.get('how_many_times'))

    if what_to_print and how_many_times > 0:
        for i in range(0, how_many_times):
            print(f"what_to_print: {what_to_print}")
        return what_to_print
    return None
