require 'spec_helper'

describe 'anagram' do
  context 'when no words' do
    it 'prints an empty string' do
      anagram = Anagram.new('')
      anagram.print.should eql ""
    end
  end

  context 'when has a file with words' do
    it 'print this words' do
      anagram = Anagram.new('./three_words.txt')
      anagram.print.should eql "pablo\npepe\nedu\n"
    end
  end
end
