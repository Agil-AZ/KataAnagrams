class Word
  attr_reader :name

  def initialize(line)
   @name = line.delete("\n")
  end

  def symbol
    @name.chars.sort.join.to_sym
  end
end
