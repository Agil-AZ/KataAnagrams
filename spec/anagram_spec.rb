require 'spec_helper'

describe 'anagram' do
  context 'when no words' do
    it 'prints an empty string' do
      anagram = Anagram.new()
      anagram.print.should eql ""
    end
  end
end
