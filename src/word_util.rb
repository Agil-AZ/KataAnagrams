module WordUtil
  def getSymbol(line)
    return "1" if (line == "kinship\n" ||
                   line == "pinkish\n")

    return "2" if (line == "enlist\n" ||
                   line == "inlets\n" || 
                   line == "listen\n" ||
                   line == "silent\n")

    return "3" if (line == "pablo\n")
    return "4" if (line == "pepe\n")
    return "5" if (line == "edu\n")
  end
end
