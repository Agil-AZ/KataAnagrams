class Anagram

  def initialize(file)
    begin
      file = File.new('./spec/' + file, 'r')
      @words = Hash.new
      while(line = file.gets)
        word = Word.new(line)
        key = word.symbol
        if @words[key] then
          @words[key] = @words[key] << " " << word.name
        else
          @words[key] = word.name
        end
      end
    rescue => err
      #TODO manage error
    end
  end

  def print
    @words.inject("") { |toRet, (key, value)| toRet << value+"\n" } if @words
  end
end
