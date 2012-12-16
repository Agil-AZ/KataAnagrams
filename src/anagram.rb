class Anagram

  def initialize(file)
    begin
      file = File.new('./spec/' + file, 'r')
      @words = Hash.new
      while(line = file.gets)
        word = Word.new(line)
        add_word_to_map(word)
      end
    rescue => err
      #TODO manage error
    end
  end

  def print
    @words.inject("") { |toRet, (key, value)| toRet << value+"\n" } if @words
  end

  private
  
  def add_word_to_map (word)
    key = word.symbol
    value = word.name
    if @words[key] then
      @words[key] = @words[key] << " " << value
    else
      @words[key] = value
    end
  end
end
