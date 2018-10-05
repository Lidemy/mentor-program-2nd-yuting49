var isPalindromes = require('./hw4')

describe("hw4", function() {
  it("should return correct answer when str = abcdcba", function() {
    expect(isPalindromes('abcdcba')).toBe(true)
  });

  it("should return correct answer when str = apple", function() {
    expect(isPalindromes('apple')).toBe(false)
  });

  it("should return correct answer when str = aaaaa", function() {
    expect(isPalindromes('aaaaa')).toBe(true)
  });

  it("should return correct answer when str = 12321", function() {
    expect(isPalindromes('12321')).toBe(true)
  });

  it("should return correct answer when str = 1234421", function() {
    expect(isPalindromes('1234421')).toBe(false)
  });
})