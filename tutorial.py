def sorting_algorithm(numbers):
    # Bubble sort implementation
    swapped = True
    while swapped:
        swapped = False
        for i in range(len(numbers) - 1):
            if numbers[i] > numbers[i + 1]:
                numbers[i], numbers[i + 1] = numbers[i + 1], numbers[i]
                swapped = True
    return numbers

numbers = [64, 34, 25, 12, 22, 11, 90]
print(sorting_algorithm(numbers))

def sorting_algorithm2(x):
    for i in range(len(x)):
        for j in range(len(x) - 1):
            if x[j] > x[j + 1]:
                x[j], x[j + 1] = x[j + 1], x[j]
    return x
x = [640, 340, 250, 120, 220, 110, 90]
print(sorting_algorithm2(x))