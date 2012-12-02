class Anagram
  def initialize(file)
    begin
      file = File.new('./spec/' + file, 'r')
      @words = Array.new
      while(line = file.gets)
        @words << line
      end
    rescue => err
      puts 'error'
    end
  end

  def print
    result = ""
    @words.each { |word| result +=word } if @words
    result
  end
end
