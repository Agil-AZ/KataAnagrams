require 'spec_helper'

describe 'word' do
  context 'when receive a line' do
    before(:each) do
      @word = Word.new("pablo\n")
    end

    it 'save the name without \n' do
      @word.name.should eql "pablo"
    end

    it 'create its symbol' do
      @word.symbol.should eql :ablop
    end
  end
end
