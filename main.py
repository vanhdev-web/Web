# from underthesea import word_tokenize
s= "Việc học tập là rất quan trọng, cho nên, cần học, học nữa, học mãi" 
#Bai_1
def get_most_frequent_words(s):
    s = s.lower()
    
    words = []
    word = ""
    for char in s:
        if char.isalnum(): 
            word += char
        else:
            if word:
                words.append(word)
                word = ""
    if word:  
        words.append(word)

    word_count = {}
    for w in words:
        if w in word_count:
            word_count[w] += 1
        else:
            word_count[w] = 1

    max_freq = max(word_count.values())

    most_frequent_words = []
    for w in word_count:
        if word_count[w] == max_freq:
            most_frequent_words.append((w, max_freq))

    return most_frequent_words

result = get_most_frequent_words(s)

print("Từ xuất hiện nhiều nhất:")
for w, freq in result:
    print(f"{w} - {freq} lần")


# #Bai_2
# def get_word_lengths(s):
#     for char in ',.!?;:':
#         s = s.replace(char, '')
#     words=s.lower().split()
#     result=[]
#     for word in words:
#         result.append((word, len(word)))
#     return result

# lengths = get_word_lengths(s)
# print("Độ dài của mỗi từ trong câu là:", lengths)

#Bai_3
dict ={"học",
       "nữa",
       "học sinh",
       "học bạ",
       "mãi",
       "học tập"}
def define_word(s, dict):
    text = s.lower()
    for ch in ",.!?;:":
        text = text.replace(ch, "")
    
    words = text.split()
    found_words = set()
   
    for w in words:
        if w in dict:
            found_words.add(w)
  
    for i in range(len(words) - 1):
        phrase = words[i] + " " + words[i+1]
        if phrase in dict:
            found_words.add(phrase)

    print("Các từ/từ ghép trong từ điển xuất hiện trong câu:")
    print(found_words)
define_word(s, dict)

