class Anagram
  include WordUtil

  def initialize(file)
    begin
      file = File.new('./spec/' + file, 'r')
      @words = Hash.new
      while(line = file.gets)
        key = getSymbol(line)
        if @words[key] then
          @words[key] = @words[key] << " " << line.delete("\n")
        else
          @words[key] = line.delete("\n")
        end
      end
    rescue => err
      puts err.to_s
    end
  end

  def print
    @words.inject("") { |toRet, (key, value)| toRet << value+"\n" } if @words
  end
end
