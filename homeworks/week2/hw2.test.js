var alphaSwap = require('./hw2')

describe("hw2", function() {
  test("should return correct answer when str = nick", function() {
    expect(alphaSwap('nick')).toBe('NICK')
  });

  test("should return correct answer when str = NICK", function() {
    expect(alphaSwap('NICK')).toBe('nick')
  });

  test("should return correct answer when str = ,hEllO122", function() {
    expect(alphaSwap(',hEllO122')).toBe(',HeLLo122')
  });

})